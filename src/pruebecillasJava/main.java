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
import java.util.Iterator;
import java.util.Map;
import java.util.Properties;
import java.util.Set;

import javax.swing.JPanel;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.transform.TransformerFactory;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;

import org.apache.poi.hssf.usermodel.HSSFDateUtil;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.DateUtil;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.w3c.dom.Document;

public class main {

	public static void main(String[] args) throws IOException {
		FileInputStream file = new FileInputStream(new File("C:\\Users\\Kike Brazález\\Desktop\\librografica.xls"));
		HSSFWorkbook workbook = new HSSFWorkbook(file);
		HSSFSheet sheet = workbook.getSheetAt(0);
		Iterator<Row> rowIterator = sheet.iterator();
		int contador = 0;
		Row row;
		ArrayList <Double> viento = new ArrayList<Double>();
		ArrayList <Double> potencia = new ArrayList<Double>();

		while (rowIterator.hasNext()){
			contador = 0;
			row = rowIterator.next();
			Iterator<Cell> cellIterator = row.cellIterator();
			Cell celda;
			while (cellIterator.hasNext()){
				celda = cellIterator.next();
				switch(celda.getCellType()) {
					case Cell.CELL_TYPE_NUMERIC:
					    if(contador==0) {
					    	viento.add(celda.getNumericCellValue());
					    }else {
					    	potencia.add(celda.getNumericCellValue());
					    }
					    break;
					case Cell.CELL_TYPE_STRING:
					    System.out.println(celda.getStringCellValue());
					    break;
					case Cell.CELL_TYPE_BOOLEAN:
					    System.out.println(celda.getBooleanCellValue());
					    break;
				}
				contador ++;
			}
		}
		System.out.println(potencia);
		System.out.println(viento);
		
		ArrayList<ArrayList<Double>> rangos = new ArrayList<ArrayList<Double>>();
		
		for(int i = 0 ; i<25;i++) rangos.add(new ArrayList<Double>());

		double indice =0.0;
		for(int i = 0;i<viento.size();i++) {
			System.out.println("COMPAR "+viento.get(i)+" - "+(int)viento.get(i).doubleValue());
			if(viento.get(i)>25 || viento.get(i)<0) {
				if(viento.get(i)>24) {
					rangos.get(0).add(potencia.get(i));
				}else {
					rangos.get(24).add(potencia.get(i));
				}
			}else {
				rangos.get((int)viento.get(i).doubleValue()).add(potencia.get(i));
			}
		}
		
		for(int i = 0 ; i<rangos.size();i++) {
			System.out.println("CONTADOR = "+i);
			System.out.println(rangos.get(i));
		}
		
		ArrayList<Double> medias = new ArrayList<Double>();
		ArrayList<Double> varianzas = new ArrayList<Double>();
		ArrayList<Double> desviaciones = new ArrayList<Double>();

		double suma=0;
		for(int i = 0 ; i<rangos.size();i++) {
			suma = 0;
			for (int j=0; j<rangos.get(i).size();j++) {
				suma = suma + rangos.get(i).get(j);
			}
			if(suma<0.0) suma = 0.0;
			medias.add(suma/(double)rangos.get(i).size());
			
		}
		
		
		System.out.println("MEDIAS");
		System.out.println(medias);
		double varianza=0.0;
		double aux=0.0;
		double N=0.0;
		for (int i= 0;i<rangos.size();i++) {
			if(medias.get(i)!=0.0) {
				varianza=0.0;
				for(int j=0;j<rangos.get(i).size(); j++) {
					aux = Math.pow(rangos.get(i).get(j) - medias.get(i),2.0);
					varianza = varianza + aux;
				}
				N=(double)rangos.get(i).size()-1;
				varianza = varianza / N;
				varianzas.add(varianza);
			}else {
				varianzas.add(0.0);
			}
		}
		
		System.out.println("VARIANZAS");
		System.out.println(varianzas);
		for (int i= 0;i<varianzas.size();i++) {
			desviaciones.add(Math.sqrt(varianzas.get(i)));
		}
		System.out.println("DESVIACIONES");
		System.out.println(desviaciones);
		
		System.out.println("RESUMEN");
		
		int maximo = 0;
		for(int i=0;i<medias.size();i++) {
			if(medias.get(i).isNaN()) {
				medias.set(i, 0.0);
				varianzas.set(i, 0.0);
				desviaciones.set(i, 0.0);
			}
			
		}
		for(int i=medias.size()/2;i<medias.size();i++) {
			if(medias.get(i)==0.0) {
				medias.set(i, medias.get(maximo));
				varianzas.set(i, varianzas.get(maximo));
				desviaciones.set(i, desviaciones.get(maximo));
			}else {
				maximo = i;
			}
			
		}
		for(int i=0;i<medias.size();i++) {
			if(medias.get(i).isNaN()) {
				medias.set(i, 0.0);
				varianzas.set(i, 0.0);
				desviaciones.set(i, 0.0);
			}
			System.out.println("	INTERVALO "+i+"-");
			System.out.println("M = "+medias.get(i));
			System.out.println("V = "+varianzas.get(i));
			System.out.println("D = "+desviaciones.get(i));
		}
		
		Ventana hola = new Ventana(medias);
        hola.setVisible(true);

		
	}
	

	

}
