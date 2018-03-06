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
		
		for(int i = 0 ; i<=40;i++) rangos.add(new ArrayList<Double>());

		double indice =0.0;
		for(int i = 0;i<viento.size();i++) {
			indice = (viento.get(i)-Math.floor(viento.get(i)))-0.5;
			
			if(indice<0) indice = Math.floor(viento.get(i));
			else indice = Math.floor(viento.get(i))+0.5;
			
			System.out.println("COMPAR "+viento.get(i)+" - "+(int)viento.get(i).doubleValue());
			if(viento.get(i)>20|| viento.get(i)<0) {
				if(viento.get(i)>20) {
					rangos.get(40).add(potencia.get(i));
				}else {
					
					rangos.get(0).add(potencia.get(i));
				}
			}else {
				if(indice==0.0)rangos.get(0).add(potencia.get(i));
				if(indice==0.5)rangos.get(1).add(potencia.get(i));
				if(indice==1.0)rangos.get(2).add(potencia.get(i));
				if(indice==1.5)rangos.get(3).add(potencia.get(i));
				if(indice==2.0)rangos.get(4).add(potencia.get(i));
				if(indice==2.5)rangos.get(5).add(potencia.get(i));
				if(indice==3.0)rangos.get(6).add(potencia.get(i));
				if(indice==3.5)rangos.get(7).add(potencia.get(i));
				if(indice==4.0)rangos.get(8).add(potencia.get(i));
				if(indice==4.5)rangos.get(9).add(potencia.get(i));
				if(indice==5.0)rangos.get(10).add(potencia.get(i));
				if(indice==5.5)rangos.get(11).add(potencia.get(i));
				if(indice==6.0)rangos.get(12).add(potencia.get(i));
				if(indice==6.5)rangos.get(13).add(potencia.get(i));
				if(indice==7.0)rangos.get(14).add(potencia.get(i));
				if(indice==7.5)rangos.get(15).add(potencia.get(i));
				if(indice==8.0)rangos.get(16).add(potencia.get(i));
				if(indice==8.5)rangos.get(17).add(potencia.get(i));
				if(indice==9.0)rangos.get(18).add(potencia.get(i));
				if(indice==9.5)rangos.get(19).add(potencia.get(i));
				if(indice==10.0)rangos.get(20).add(potencia.get(i));
				if(indice==10.5)rangos.get(21).add(potencia.get(i));
				if(indice==11.0)rangos.get(22).add(potencia.get(i));
				if(indice==11.5)rangos.get(23).add(potencia.get(i));
				if(indice==12.0)rangos.get(24).add(potencia.get(i));
				if(indice==12.5)rangos.get(25).add(potencia.get(i));
				if(indice==13.0)rangos.get(26).add(potencia.get(i));
				if(indice==13.5)rangos.get(27).add(potencia.get(i));
				if(indice==14.0)rangos.get(28).add(potencia.get(i));
				if(indice==14.5)rangos.get(29).add(potencia.get(i));
				if(indice==15.0)rangos.get(30).add(potencia.get(i));
				if(indice==15.5)rangos.get(31).add(potencia.get(i));
				if(indice==16.0)rangos.get(32).add(potencia.get(i));
				if(indice==16.5)rangos.get(33).add(potencia.get(i));
				if(indice==17.0)rangos.get(34).add(potencia.get(i));
				if(indice==17.5)rangos.get(35).add(potencia.get(i));
				if(indice==18.0)rangos.get(36).add(potencia.get(i));
				if(indice==18.5)rangos.get(37).add(potencia.get(i));
				if(indice==19.0)rangos.get(38).add(potencia.get(i));
				if(indice==19.5)rangos.get(39).add(potencia.get(i));
				if(indice==20.0)rangos.get(40).add(potencia.get(i));
			}
		}
		double inter=0.0;
		for(int i = 0 ; i<rangos.size();i++) {
			System.out.println("CONTADOR = "+inter);
			System.out.println(rangos.get(i));
			inter=inter+0.5;
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
		inter=0.0;
		for(int i=0;i<medias.size();i++) {
			if(medias.get(i).isNaN() || i==0) {
				medias.set(i, 0.0);
				varianzas.set(i, 0.0);
				desviaciones.set(i, 0.0);
			}
			System.out.println(i+"	INTERVALO "+inter);
			System.out.println("M = "+medias.get(i));
			System.out.println("V = "+varianzas.get(i));
			System.out.println("D = "+desviaciones.get(i));
			inter=inter+0.5;

		}
		String salida="";
		inter = 0.0;
		for(int i=0;i<medias.size();i++) {
			
			if(i==0) salida = inter+","+medias.get(i)+","+desviaciones.get(i)+",0";
			else salida=salida+":"+inter+","+medias.get(i)+","+desviaciones.get(i)+",0";
			
			inter=inter+0.5;
		}
		System.out.println(salida);
		Ventana hola = new Ventana(medias);
        hola.setVisible(true);

		
	}
	

	

}
