import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

class Biblioteca extends JFrame implements ActionListener {

  JButton signupButton, signinButton;
  JPanel MainPanel;

  Biblioteca() {
    signupButton = new JButton("Sign up");
    signinButton = new JButton("Sign in");

    MainPanel = new JPanel(new GridLayout(3,1));
    MainPanel.add(signupButton);
    MainPanel.add(signinButton);
		add(MainPanel,BorderLayout.CENTER);
		

    signupButton.addActionListener(this);
    signinButton.addActionListener(this);
  }

    public void actionPerformed(ActionEvent ae) {
			System.out.println(ae.getActionCommand());

			if(ae.getActionCommand() == "Sign in") {
				Login loginPage = new Login();
				loginPage.setVisible(true);

      	JLabel label = new JLabel("Welcome, ");
      	loginPage.getContentPane();
			}

			if(ae.getActionCommand() == "Sign up") {
				Register registerPage = new Register();
				registerPage.setVisible(true);
				JLabel label = new JLabel("Hi");
				registerPage.getContentPane();
			}

      
		}    
}


class Main {
  public static void main(String arg[]) {
  	try {
      Biblioteca frame = new Biblioteca();
      frame.setSize(300,100);
      frame.setVisible(true);
    } catch (Exception e) {
			JOptionPane.showMessageDialog(null, e.getMessage());
		}
	}
}