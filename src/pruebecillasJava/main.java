package pruebecillasJava;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.nio.ByteBuffer;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

import Clasificator.EventoInfo;



import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.util.HashMap;
import java.util.Map;
import java.util.Properties;
import java.util.Set;
 
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.transform.TransformerFactory;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;

import org.w3c.dom.Document;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Process process = null;
		String base = "C:\\Users\\Kike Brazález\\Desktop\\";
		String source = base+"10Min20180101_AVG_60.db";
		try {
			process = new ProcessBuilder("C:\\Users\\Kike Brazález\\Desktop\\paradox-dbase-reader.exe","-c","-i",source,"-o",base,"-f","excel").start();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
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
