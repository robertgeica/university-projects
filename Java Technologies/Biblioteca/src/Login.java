import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;

class Login extends JFrame implements ActionListener {
  JButton submitButton;
  JPanel LoginPanel;
  JLabel usernameLabel, passwordLabel;
	final JTextField usernameText, passwordText;
		
	private static Scanner scanner = new Scanner(System.in);

  Login() {

		setTitle("Conecteaza-te la biblioteca.");
		setSize(400, 200);
    usernameLabel = new JLabel();
    usernameLabel.setText("Username:");
    usernameText = new JTextField(15);

    passwordLabel = new JLabel();
    passwordLabel.setText("Password:");
    passwordText = new JPasswordField(15);

    submitButton = new JButton("Submit");

    LoginPanel = new JPanel(new GridLayout(3,1));
    LoginPanel.add(usernameLabel);
    LoginPanel.add(usernameText);
    LoginPanel.add(passwordLabel);
    LoginPanel.add(passwordText);
    LoginPanel.add(submitButton);
    add(LoginPanel,BorderLayout.CENTER);
    submitButton.addActionListener(this);
    setTitle("Intra in contul tau");
  }

	public static void readFile() {
		
	}

  public void actionPerformed(ActionEvent ae) {

		String fileName = "users.txt";
		String line = null;

		String usernameInput = usernameText.getText();
    String passwordInput = passwordText.getText();
		Boolean isExistingAccount = false;

		try {
			FileReader fileReader = new FileReader(fileName);
			BufferedReader bufferedReader = new BufferedReader(fileReader);

			while ((line = bufferedReader.readLine()) != null) {
				String[] splited = line.split("\\s+");
				// System.out.println(splited[0]);
				// System.out.println(splited[1]);

				if (usernameInput.equals(splited[0]) && passwordInput.equals(splited[1])) {
            FirstPage page = new FirstPage();
						page.setVisible(true);
						
      	  // page.getContentPane();
						isExistingAccount = true;
						System.out.println("logged in.");
						break;
						
				} 
			}

			if (isExistingAccount == false) {
				System.out.println("Username sau parola incorecte.");
				JOptionPane.showMessageDialog(this,"Incorrect login or password", "Error",JOptionPane.ERROR_MESSAGE);
			}


		} catch (FileNotFoundException ex) {
			System.out.println("Unable to open file '" + fileName + "'");
		} catch (IOException ex) {
				System.out.println("Error reading file '" + fileName + "'");
		}

	}
		
		
}

class LoginDemo
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