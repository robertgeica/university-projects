import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;

class Register extends JFrame implements ActionListener {
  JButton submitButton;
  JPanel RegisterPanel;
  JLabel usernameLabel, passwordLabel, infoLabel;
	final JTextField usernameText, passwordText;
		
	private static Scanner scanner = new Scanner(System.in);


  Register() {

  setSize(400, 200);

    usernameLabel = new JLabel();
    usernameLabel.setText("Username:");
    usernameText = new JTextField(15);

    passwordLabel = new JLabel();
    passwordLabel.setText("Parola:");
    passwordText = new JPasswordField(15);

    infoLabel = new JLabel();

    submitButton = new JButton("Creaza cont");

    RegisterPanel = new JPanel(new GridLayout(5,5));
    RegisterPanel.add(infoLabel);
    RegisterPanel.add(usernameLabel);
    RegisterPanel.add(usernameText);
    RegisterPanel.add(passwordLabel);
    RegisterPanel.add(passwordText);
    RegisterPanel.add(submitButton);
    add(RegisterPanel,BorderLayout.CENTER);
    submitButton.addActionListener(this);
    setTitle("Inregistreaza-te la biblioteca.");
  }


  public void actionPerformed(ActionEvent ae) {

		String fileName = "users.txt";
    scanner.useDelimiter("\\n");

		String usernameInput = usernameText.getText();
    String passwordInput = passwordText.getText();

		try {
			FileWriter fileWriter = new FileWriter(fileName, true);
      
        String userInfo = usernameInput + " " + passwordInput;
        fileWriter.write("\r\n"); 
        fileWriter.write(userInfo);
        fileWriter.close();
        
        infoLabel.setText("Cont creat! Va rugam sa va logati.");

		} catch (FileNotFoundException ex) {
			System.out.println("Unable to open file '" + fileName + "'");
		} catch (IOException ex) {
				System.out.println("Error reading file '" + fileName + "'");
		}

	}
		
		
}

