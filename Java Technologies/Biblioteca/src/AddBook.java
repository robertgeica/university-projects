import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;

class AddBook extends JFrame implements ActionListener {
  JButton submitButton;
  JPanel AddPanel;
  JLabel titleLabel, authorLabel, pagesLabel, descriptionLabel, priceLabel, infoLabel;

	final JTextField titleText, authorText, pagesText, descriptionText, priceText;
		
	private static Scanner scanner = new Scanner(System.in);

  AddBook() {

		setSize(400, 200);

    titleLabel = new JLabel();
    titleLabel.setText("Titlu:");
    titleText = new JTextField(15);

    authorLabel = new JLabel();
    authorLabel.setText("Autor:");
    authorText = new JTextField(15);

    pagesLabel = new JLabel();
    pagesLabel.setText("Pagini:");
    pagesText = new JTextField(15);


    descriptionLabel = new JLabel();
    descriptionLabel.setText("Descriere:");
    descriptionText = new JTextField(15);


    priceLabel = new JLabel();
    priceLabel.setText("Pret:");
    priceText = new JTextField(15);

    submitButton = new JButton("Submit");

    AddPanel = new JPanel(new GridLayout(3,1));
    AddPanel.add(titleLabel);
    AddPanel.add(titleText);
    AddPanel.add(authorLabel);
    AddPanel.add(authorText);
    AddPanel.add(pagesLabel);
    AddPanel.add(pagesText);
    AddPanel.add(descriptionLabel);
    AddPanel.add(descriptionText);
    AddPanel.add(priceLabel);
    AddPanel.add(priceText);
    AddPanel.add(submitButton);

    add(AddPanel,BorderLayout.CENTER);
    submitButton.addActionListener(this);
  }



  public void actionPerformed(ActionEvent ae) {

		String fileName = "books.txt";
    scanner.useDelimiter("\\n");

		String titleInput = titleText.getText();
    String authorInput = authorText.getText();
    String pagesInput = pagesText.getText();
    String descriptionInput = descriptionText.getText();
    String priceInput = priceText.getText();

		try {
			FileWriter fileWriter = new FileWriter(fileName, true);
      
        String bookInfo = titleInput + "/" + authorInput + "/" + pagesInput + "/" + descriptionInput + "/" + priceInput;
        fileWriter.write("\r\n"); 
        fileWriter.write(bookInfo);
        fileWriter.close();
        
        infoLabel.setText("Cartea a fost salvata!");

		} catch (FileNotFoundException ex) {
			System.out.println("Unable to open file '" + fileName + "'");
		} catch (IOException ex) {
				System.out.println("Error reading file '" + fileName + "'");
		}

	}
		
		
}

class ABDemo
{
    public static void main(String arg[])
    {
        try
        {
            Login frame = new Login();
            frame.setSize(300,200);
            frame.setVisible(true);
        }
        catch(Exception e)
        {JOptionPane.showMessageDialog(null, e.getMessage());}
    }
}