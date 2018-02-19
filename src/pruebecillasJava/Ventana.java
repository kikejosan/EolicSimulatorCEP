package pruebecillasJava;

import java.util.ArrayList;

import javax.swing.JFrame;
import javax.swing.JPanel;

import org.jfree.chart.ChartFactory;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.plot.PlotOrientation;
import org.jfree.data.category.DefaultCategoryDataset;

public class Ventana extends JFrame{
    JPanel panel;
    public Ventana(ArrayList<Double> datos){
        setTitle("Como Hacer Graficos con Java");
        setSize(800,600);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setVisible(true);
        init(datos);
    }
 
    private void init(ArrayList<Double> datos) {
        panel = new JPanel();
        getContentPane().add(panel);
        // Fuente de Datos
        DefaultCategoryDataset line_chart_dataset = new DefaultCategoryDataset();
        Integer c = new Integer(0);
        for(int i=0;i<datos.size();i++) {
        	c++;
        	System.out.println(datos.get(i));
        	
        	line_chart_dataset.addValue(datos.get(i), "Potencia",c.toString() );
        }
   
 
        // Creando el Grafico
        JFreeChart chart=ChartFactory.createLineChart("Trafico en el Blog",
                "Mes","Visitas",line_chart_dataset,PlotOrientation.VERTICAL,
                true,true,false);  
        JFreeChart chart2=ChartFactory.createBarChart3D("Trafico en el Blog",
                "Mes","Visitas",line_chart_dataset,PlotOrientation.VERTICAL,
                true,true,false); 
        
        // Mostrar Grafico
        ChartPanel chartPanel = new ChartPanel(chart);
        //panel.add(chartPanel);
        panel.add(new ChartPanel(chart2));
    }
    
   
}