package Clasificator;
import java.util.Date;

public class EventoInfo {
	int index;
	int systemNumber;
	Date date;
	Date time;
	int timeOffset;
	int count;
	double power;
	double towerDeflection;
	double powerFactor;
	double reactivePower;
	double voltageL1_N;
	double voltageL2_N;
	double voltageL3_N;
	double currentL1;
	double currentL2;
	double currentL3;
	double generatorSpeedCCU;
	double rotorSpeedPLC;
	double blade1ActualDegree;
	double windSpeed;
	double nacellePosition;
	double nacelleRevolution;
	double generatorSpeedPLC;
	double windDeviationOneSec;
	double blade2ActualDegree;
	double blade3ActualDegree;
	double blade1SetDegree;
	double blade2SetDegree;
	double blade3SetDegree;
	double powerFactorSet;
	double nSet1;
	double nSet2;
	double tOrqueActual;
	double tOrqueSet;
	double operatingState;
	double nacellePicture;
	double windDeviation10;
	double tempGen1;
	double tempGen2;
	double tempBearingA;
	double tempBearingB;
	double teamGearbox;
	double tempAir;
	double tempNacelle;
	double tempGenCoolingAir;
	double tempGearboxBearing;
	
	double tempShaftBearing;
	double highSpeedRunningNumber;
	double lineFrequency;
	double reserve2;
	double circuitBreakerCutIns;
	double towerAceleration;
	double driveTrainAcceleration;
	double tempGearboxBearingB;
	
	double reserve12;
	double reserve13;
	double reserve14;
	double tTowerBase1;
	double tTowerBase2;
	double tempExternalOilHeater;
	double vacummExternalOilHeater;
	double hydraulicPrepressure;
	double scopeCH1;
	double scopeCH2;
	double scopeCH3;
	double scopeCH4;
	double DI1Main;
	double reserve8;
	double DI1Top;
	double DI2Top;
	double reserve9;
	double CANIO;
	double DO1Main;
	double reserve10;
	double DO1Top;
	double reserve11;
	
	
	
	public String toString() {
		
		return  index+" "+
				systemNumber+" "+
				date+" "+
				time+" "+
				timeOffset+" "+
				count+" "+
				power+" "+
				towerDeflection+" "+
				powerFactor+" "+
				reactivePower+" "+
				voltageL1_N+" "+
				voltageL2_N+" "+
				voltageL3_N+" "+
				currentL1+" "+
				currentL2+" "+
				currentL3+" "+
				generatorSpeedCCU+" "+
				rotorSpeedPLC+" "+
				blade1ActualDegree+" "+
				windSpeed+" "+
				nacellePosition+" "+
				nacelleRevolution+" "+
				generatorSpeedPLC+" "+
				windDeviationOneSec+" "+
				blade2ActualDegree+" "+
				blade3ActualDegree+" "+
				blade1SetDegree+" "+
				blade2SetDegree+" "+
				blade3SetDegree+" "+
				powerFactorSet+" "+
				nSet1+" "+
				nSet2+" "+
				tOrqueActual+" "+
				tOrqueSet+" "+
				operatingState+" "+
				nacellePicture+" "+
				windDeviation10+" "+
				tempGen1+" "+
				tempGen2+" "+
				tempBearingA+" "+
				tempBearingB+" "+
				teamGearbox+" "+
				tempAir+" "+
				tempNacelle+" "+
				tempGenCoolingAir+" "+
				tempGearboxBearing+" "+
 			   	tempShaftBearing+" "+
				highSpeedRunningNumber+" "+
				lineFrequency+" "+
				reserve2+" "+
				circuitBreakerCutIns+" "+
				towerAceleration+" "+
				driveTrainAcceleration+" "+
				tempGearboxBearingB+" "+
				reserve12+" "+
				reserve13+" "+
				reserve14+" "+
				tTowerBase1+" "+
				tTowerBase2+" "+
				tempExternalOilHeater+" "+
				vacummExternalOilHeater+" "+
				hydraulicPrepressure+" "+
				scopeCH1+" "+
				scopeCH2+" "+
				scopeCH3+" "+
				scopeCH4+" "+
				DI1Main+" "+
				reserve8+" "+
				DI1Top+" "+
				DI2Top+" "+
				reserve9+" "+
				CANIO+" "+
				DO1Main+" "+
				reserve10+" "+
				DO1Top+" "+
				reserve11;
		
	}
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
