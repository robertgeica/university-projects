import { login, logout, register, getUser } from "./api/auth.js";
import { addProduct, getProducts, getUserProducts } from "./api/product.js";
import { getCategories } from "./api/category.js";
import { store, setStore } from "./store/store.js";
import { getDifferenceBetweenDates, redirectToPage } from "./utils.js";

// update store if userId & auth-token
if (localStorage["userId"] && localStorage["auth-token"]) {
  let user = await getUser(localStorage["userId"]).then((response) => response);
  const { id, email, firstName, lastName, role, offersIds, productsIds } = user;
  let categories = await getCategories().then((response) => response);
  let products = await getProducts().then((response) => response);
  let userProducts = await getUserProducts(user).then((response) => response);

  setStore({
    ...store(),
    user: { id, email, firstName, lastName, role, offersIds, productsIds },
    categories: [...categories],
    products: [...products],
    userProducts: [...userProducts],
  });
}

const updateProfileInfos = (store) => {
  document.getElementById("userId").innerHTML = store.user.id;
  document.getElementById("userEmail").innerHTML = store.user.email;
  document.getElementById(
    "userFullName"
  ).innerHTML = `${store.user.firstName} ${store.user.lastName}`;
  const products = store.userProducts.map(
    (product) => `<span>${product.name}</span>`
  );
  document.getElementById("userProductsIds").innerHTML = products;

  const offers = store.user.offersIds.map(
    (offer) => `<span>${offer.value}</span>`
  );
  document.getElementById("userOffersIds").innerHTML = offers;
};

const addNewProduct = (store) => {
  const addProductBtn = document.getElementById("add-product-btn");
  const selectCategory = document.getElementById("select-category");
  store.categories.forEach((categ) => {
    categ.subcategories.forEach((subcateg) => {
      const optionSubcategory = `<option value="${subcateg}">---${subcateg}</option>`;
      selectCategory.innerHTML = optionSubcategory + selectCategory.innerHTML;
    });

    const optionCategory = `<option value="${categ.name}">${categ.name}</option>`;
    selectCategory.innerHTML = optionCategory + selectCategory.innerHTML;
  });

  let selectedCategories = [];
  document.getElementById("select-category").addEventListener("click", (e) => {
    const categoryValue = e.target.value;
    const isEmptyCategoriesArr = selectedCategories.length === 0;
    const isUndefinedValue = typeof categoryValue == "undefined";

    if (isEmptyCategoriesArr && !isUndefinedValue) {
      selectedCategories.push(categoryValue);
    }

    if (!isEmptyCategoriesArr && !isUndefinedValue) {
      const isAlreadySelected = selectedCategories.find(
        (value) => value === categoryValue
      );

      if (isAlreadySelected) {
        selectedCategories = selectedCategories.filter(
          (value) => value !== categoryValue
        );
      } else {
        selectedCategories.push(categoryValue);
      }
    }
  });

  addProductBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const productName = document.getElementById("productName").value;
    const startPrice = document.getElementById("startPrice").value;
    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
    const auctionType = document.getElementById("auctionType").value;
    const description = document.getElementById("description").value;
    const imageUrl = document.getElementById("imageUrl").value;

    const product = {
      userId: store.user.id,
      name: productName,
      startPrice,
      startDate,
      endDate,
      auctionType,
      description,
      imageUrl,
      categories: selectedCategories,
    };

    addProduct(product);
  });

  // Add product modal
  const addProductModal = document.getElementById("add-product-modal");
  const addProductModalBtn = document.getElementById("add-product-modal-btn");
  const closeProductModal = document.getElementsByClassName("close-product")[0];
  addProductModalBtn.onclick = () => (addProductModal.style.display = "block");
  closeProductModal.onclick = () => (addProductModal.style.display = "none");

  window.onclick = (event) => {
    if (event.target == addProductModal) {
      addProductModal.style.display = "none";
    }
  };
};

const viewProducts = (store) => {
  // Products list modal
  const productsModal = document.getElementById("products-modal");
  const productsModalContent = document.getElementById(
    "products-modal-content"
  );
  const productsModalBtn = document.getElementById("products-modal-btn");
  const closeProductsBtn = document.getElementsByClassName("close-product")[1];

  productsModalBtn.onclick = () => (productsModal.style.display = "block");
  closeProductsBtn.onclick = () => (productsModal.style.display = "none");
  window.onclick = (event) => {
    if (event.target == productsModal) {
      productsModal.style.display = "none";
    }
  };

  const tableRows = store.userProducts.map(
    (product) => {
      const lastOffer = product.offers.length === 0 ? 0 : product.offers[product.offers.length - 1].value;
      return `
      <tr>
      <td class="product-link" data-id="${product.id}">${product.name}</td>
      <td>${getDifferenceBetweenDates(product.startDate, product.endDate)}</td>
      <td>${product.startPrice}</td>
      <td>${lastOffer}</td>
      <td>${product.offers.length}</td>
      </tr>
      `
    }
  );

  const myProductsTable = `
    <div class="product-table">
      <table>
        <tr>
          <th>Name</th>
          <th>Days left</th>
          <th>Start price</th>
          <th>Last offer</th>
          <th>Total offers</th>
        </tr>
        ${tableRows.join("")}
      </table>
    </div>`;

  productsModalContent.innerHTML =
    productsModalContent.innerHTML + myProductsTable;
};

const isUserPage = window.location.pathname === "/frontend/pages/user.html";
if (store().user.id && isUserPage) {
  await getUserProducts(store().user);

  updateProfileInfos(store());
  addNewProduct(store());
  viewProducts(store());
}

const setProduct = (e) => {
  const id = e.target.dataset.id;
  localStorage.setItem("productId", id);
  redirectToPage("http://127.0.0.1:5500/frontend/pages/product.html");
};

const links = document.querySelectorAll(".product-link");
links.forEach((link) => {
  link.addEventListener("click", (e) => {
    setProduct(e);
  });
});
