import { login, logout, register, getUser } from "./api/auth.js";
import {
  redirectToPage,
  convertDate,
  getDifferenceBetweenDates,
  renderLastOffer,
} from "./utils.js";
import {
  getProduct,
  getProducts,
  getUserProducts,
  addNewOffer,
} from "./api/product.js";
import { getCategories } from "./api/category.js";
import { store, setStore } from "./store/store.js";

// show/hide navbar links
if (localStorage["auth-token"]) {
  document.getElementById("not-auth").classList.add("hide");
} else {
  document.getElementById("auth").classList.add("hide");
  window.location.pathname === "/frontend/" || window.location.pathname === "/frontend/index.html" ? 
  redirectToPage('http://127.0.0.1:5500/frontend/pages/login.html') : '';
}

// update store if userId & auth-token
if (localStorage["userId"] && localStorage["auth-token"]) {
  let user = await getUser(localStorage["userId"]).then((response) => response);
  const { id, email, firstName, lastName, role, offersIds, productsIds } = user;
  let categories = await getCategories().then((response) => response);
  let products = await getProducts().then((response) => response);

  setStore({
    ...store(),
    user: { id, email, firstName, lastName, role, offersIds, productsIds },
    categories: [...categories],
    products: [...products],
  });
}

// pages
const isLoginPage = window.location.pathname === "/frontend/pages/login.html";
const isRegisterPage =
  window.location.pathname === "/frontend/pages/register.html";

// prevent access to login/register page if user is already logged-in
if (localStorage["auth-token"] && (isLoginPage || isRegisterPage)) {
  redirectToPage("http://127.0.0.1:5500/frontend/index.html");
}

// get DOM elements for login/register form
const userEmail = document.getElementById("user-email");
const userPassword = document.getElementById("user-password");
const userFirstname = document.getElementById("user-firstname");
const userLastname = document.getElementById("user-lastname");


if (isLoginPage) {
  const loginButton = document.getElementById("login-button");
  loginButton.addEventListener("click", async (e) => {
    e.preventDefault();
    console.log(userEmail, userPassword.value);
    await login(userEmail.value, userPassword.value);
  });
}

if (isRegisterPage) {
  const registerButton = document.getElementById("register-button");
  registerButton.addEventListener("click", async (e) => {
    e.preventDefault();

    await register(
      userEmail.value,
      userFirstname.value,
      userLastname.value,
      userPassword.value
    );
  });
}



// if user role is admin, display admin page link
if (store().user.role === "admin") {
  const isHomepage = window.location.pathname === "/frontend/index.html";
  const adminLink = `<a class="link" href="${
    isHomepage ? "./pages/admin.html" : "../pages/admin.html"
  }">Admin</a>`;
  const authContainer = document.getElementById("auth");
  authContainer.innerHTML = adminLink + authContainer.innerHTML;
}

const isHomepage = window.location.pathname === "/frontend/index.html";
// renderCard
const renderCard = (auction) => {
  const category = auction.categories.map(
    (category) => ` <span>${category}</span>`
  );
  const lastOffer = renderLastOffer(auction.offers, auction.startPrice);

  return `
  <div class="auction-container">
    <img src="https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg" width="400" height="200" alt="photo" data-id="${
      auction.id
    }" />
    <div class="text-content">
      <h3 data-id="${auction.id}">${auction.name}</h3>
      <h5 data-id="${auction.id}">${category}</h5>
      <p data-id="${auction.id}"> Last offer:
        ${lastOffer}
      </p>
      <p data-id="${auction.id}">${getDifferenceBetweenDates(
    auction.startDate,
    auction.endDate
  )} days left</p>
    </div>
  </div>
  `;
};

const auctionCategoriesFilter = document.getElementById(
  "auctions-category-select"
);
const renderAuctions = (isFiltered, selectedCategory) => {
  if (selectedCategory === "all") {
    isFiltered = false;
  }

  const auctions =
    isFiltered && selectedCategory.length !== 0 ? isFiltered : store().products;
  auctionCategoriesFilter.innerHTML = "";

  const all = `<option value="all">All categories</option>`;
  store().categories.forEach((category, index) => {
    category.subcategories.forEach((subcategory) => {
      const optionSubcategory = `<option value="${subcategory}" ${
        subcategory === selectedCategory ? "selected" : ""
      }>---${subcategory}</option>`;

      auctionCategoriesFilter.innerHTML =
        optionSubcategory + auctionCategoriesFilter.innerHTML;
    });

    const optionCategory = `<option value="${category.name}" ${
      category.name === selectedCategory ? "selected" : ""
    }>${category.name}</option>`;

    auctionCategoriesFilter.innerHTML =
      optionCategory + auctionCategoriesFilter.innerHTML;
  });
  auctionCategoriesFilter.innerHTML = all + auctionCategoriesFilter.innerHTML;
  const cards = auctions.map((auction) => renderCard(auction));

  return cards.join("");
};

const filterAuctions = () => {
  auctionCategoriesFilter.onchange = (e) => {
    const auctions = store().products;
    const selectedCategory = e.target.value;
    let newAuctions = auctions.map((product) => {
      const hasCategory = product.categories.filter(
        (category) => category === auctionCategoriesFilter.value
      );

      if (hasCategory.length > 0) {
        return product;
      }
    });

    newAuctions = newAuctions.filter(
      (product) => typeof product !== "undefined"
    );

    document.getElementById("auctions").innerHTML = renderAuctions(
      newAuctions,
      selectedCategory.trim()
    );
  };
};

if (isHomepage) {
  const auctionsContainer = document.getElementById("auctions");
  auctionsContainer.innerHTML = renderAuctions();

  filterAuctions();
}

const auctionContainer = document.querySelectorAll(".auction-container");
const addLinkToAuction = () => {
  for (const auction of auctionContainer) {
    auction.addEventListener("click", (e) => {
      localStorage.setItem("productId", e.target.dataset.id);
      redirectToPage(`http://127.0.0.1:5500/frontend/pages/product.html`);
    });
  }
}
addLinkToAuction();

/*
  FEATURES: 
    - add possibility to add more categories to a product
    - add alerts
  BUGS: 
    - fix duplicate key error in mongodb
    - redirect to auction page doesn't work after filter
    - logout function doesn't work anymore
  IMPROVEMENTS:
    - add link to products in user page
    - add better design for offers
*/

