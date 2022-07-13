import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;

class FirstPage extends JFrame implements ActionListener {

  JButton addBookButton, searchButton, viewBooksButton;
  JPanel MainPanel;

  FirstPage() {
    setSize(400, 200);

    addBookButton = new JButton("Adaugare carte");
    searchButton = new JButton("Cauta carte");
    viewBooksButton = new JButton("Vizualizeaza carti");

    MainPanel = new JPanel(new GridLayout(3,1));
    MainPanel.add(addBookButton);
    MainPanel.add(searchButton);
    MainPanel.add(viewBooksButton);

		add(MainPanel,BorderLayout.CENTER);
		

    addBookButton.addActionListener(this);
    searchButton.addActionListener(this);
    viewBooksButton.addActionListener(this);
    setTitle("Biblioteca");
  }

    public void actionPerformed(ActionEvent ae) {

			if(ae.getActionCommand() == "Adaugare carte") {
				AddBook addBookPage = new AddBook();
				addBookPage.setVisible(true);

			}
      
      // search book

      if(ae.getActionCommand() == "Vizualizeaza carti") {
				ViewBooks viewBooksPage = new ViewBooks();
				viewBooksPage.setVisible(true);

			}
      
		}    
}


class FPDemo {
  public static void main(String arg[]) {
  	try {


      FirstPage frame = new FirstPage();
      frame.setSize(300,100);
      frame.setVisible(true);
    } catch (Exception e) {
			JOptionPane.showMessageDialog(null, e.getMessage());
		}
	}
}