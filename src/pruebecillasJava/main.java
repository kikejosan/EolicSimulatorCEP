package pruebecillasJava;

import java.io.IOException;
import java.nio.ByteBuffer;
import java.util.ArrayList;

import Clasificator.EventoInfo;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		String hola = "[4.0, 7.24019033E8, Tue Jun 07 00:00:00 CEST 2016, Sun Dec 31 00:30:00 CET 1899, 120.0, 600.0, 283.458333333333, 2190.0, -0.972059957394737, -70.44, 398.068333333333, 396.34, 397.795, 245.128333333333, 246.385, 247.265, 1359.71166666667, 13.8246666666667, 1.24000000000001, 6.31516666666666, 338.5, 1.20000000000001, 1358.46, 0.0, 1.20000000000001, 1.25, 1.29999999999999, 1.29999999999999, 1.29999999999999, 1.0, 1800.0, 1080.0, 24.6448333333334, 24.6458333333333, 16.0, 2.0, 0.0, 58.0, 58.0, 32.0283333333333, 45.0, 52.83, 13.3066666666667, 23.635, 54.8766666666667, 62.4566666666667, 37.0, 0.0, 50.0184333333334, 0.0, 2137.0, 29.2816666666667, 46.9866666666667, -2.0, 52.0, 0.0, 0.0, -275.0, -272.0, 0.0, 0.0, 64.275, 0.0, 0.0, 0.0, 0.0, 1.25874288E8, 0.0, -3.3266489E7, 2109723.0, 0.0, 1.074856711E9, 6292.0, 0.0, -1.072430686E9, 2056.0]";
		
		System.out.println(hola.getBytes());
		System.out.println(openFileToString(hola.getBytes()));
		
		

		

		
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
