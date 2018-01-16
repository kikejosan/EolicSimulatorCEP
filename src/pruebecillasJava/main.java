package pruebecillasJava;

import java.io.IOException;
import java.nio.ByteBuffer;
import java.util.ArrayList;
import java.util.Scanner;

import Clasificator.EventoInfo;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner scan = new Scanner(System.in);
	    StringBuilder sb = new StringBuilder(scan.nextLine());
	    int c=0;

	    while(c< sb.length()-1){
	        if(sb.charAt(c) == sb.charAt(c+1)){
	            sb.delete(c,c+2);
	            c=0;
	        }
	        else{
	            c+=1;
	        }
	    }
	    if(sb.length() == 0)
	        System.out.println("Empty String");
	    else
	        System.out.println(sb.toString());
		

		

		
	}
	public static String openFileToString(byte[] _bytes)
	{
	    String file_string = "";

	    for(int i = 0; i < _bytes.length; i++)
	    {
	        file_string += (char)_bytes[i];
	    }

	    return file_string;    
	}
	public static double convertToDouble(byte[] array) {
	    ByteBuffer buffer = ByteBuffer.wrap(array);
	    return buffer.getDouble();

	 }
	public static byte[] convertToByteArray(double value) {
	      byte[] bytes = new byte[8];
	      ByteBuffer buffer = ByteBuffer.allocate(bytes.length);
	      buffer.putDouble(value);
	      return buffer.array();

	  }
	  

}
