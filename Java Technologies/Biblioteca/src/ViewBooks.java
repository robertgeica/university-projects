import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;
import javax.swing.JFrame; 
import javax.swing.JScrollPane; 
import javax.swing.JTable; 
import java.util.Arrays;

class ViewBooks extends JFrame  {

  JTable table;
  JFrame Frame;
  String line = null;
  int i = 0;
  String[][] data = new String[99][99];


  ViewBooks() {
    Frame = new JFrame();
    Frame.setTitle("Carti disponibile");

    try {
      FileReader fileReader = new FileReader("books.txt");
      BufferedReader bufferedReader = new BufferedReader(fileReader);
      

      while( (line = bufferedReader.readLine()) != null) {
        i++;
        String[] splited = line.split("/");
        String book = Arrays.toString(splited);

        String[] bookInfo = book.split(",");
        System.out.println(bookInfo[3]);

        String title = bookInfo[0];
        String author = bookInfo[1];
        String pages = bookInfo[2];
        String description = bookInfo[3];
        String price = bookInfo[4];

        for(int j = 0; j < i; j++) {
          data[i][0] = title;
          data[i][1] = author;
          data[i][2] = pages;
          data[i][3] = description;
          data[i][4] = price;
        };

      }

    } catch (IOException ex) {
				System.out.println("Error reading file.");
		}

    
  

    System.out.println(data);
      
		String[] columnNames = { "Titlu", "Autor", "Pagini", "Descriere", "Pret" };
    // Initializing the JTable 
		table = new JTable(data, columnNames); 
		table.setBounds(30, 40, 200, 300); 
    // adding it to JScrollPane 
		JScrollPane sp = new JScrollPane(table); 
		Frame.add(sp); 
    Frame.setSize(500,200);
    Frame.setVisible(true);

    setTitle("Biblioteca");
  }
  
}


class VBDemo {
  public static void main(String arg[]) {
  	
    new ViewBooks();

	}
}