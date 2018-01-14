package pruebecillasJava;

import java.nio.ByteBuffer;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String cadena= "Hola transformacion";
		byte[] bina = cadena.getBytes();
		System.out.println(cadena + " " + bina);
		System.out.println(bina + " " + openFileToString(bina));
		
		System.out.println("TRANSFORMACION DE STRING A BYTES HECHA");
		
		double miDouble = convertToDouble (bina);
		System.out.println(cadena + " " + bina + " " + miDouble);
		System.out.println("miDouble = "+miDouble+" igual a "+convertToByteArray(miDouble));
		System.out.println("TRANSFORMACION DE BINARIO A DOUBLE HECHA");
		
		
		System.out.println("LA CADENA DESPUES DE LAS TRANSFORMACIONES "+cadena);


		

		
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
