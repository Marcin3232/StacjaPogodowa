#include <Wire.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
#include <LiquidCrystal_I2C.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <MD5Builder.h>
String header;
unsigned long currentTime = millis();
unsigned long previousTime = 0; 
const long timeoutTime = 2000;
//czas
const char* ntpServer = "0.pl.pool.ntp.org";
const long  gmtOffset_sec = 0;
const int   daylightOffset_sec = 3600;
char buffer[80];
char hash[30];
String hashON = "aaa";
//md5
MD5Builder _md5;
//

String md5(String str) {
  _md5.begin();
  _md5.add(String(str));
  _md5.calculate();
  return _md5.toString();
}

//wyswietlacz
#define SEALEVELPRESSURE_HPA (1013.25)
#define LCD_COLUMNS 16
#define LCD_ROWS 2
#define LCD_SDA_PIN D2
#define LCD_SCL_PIN D1
#define hoscik "192.168.43.116" //definiowanie ip serwera
 //inicjacja wyswietlacza i czujnika
LiquidCrystal_I2C lcd(0x27, LCD_COLUMNS, LCD_ROWS);
Adafruit_BME280 bme; // I2C

unsigned long delayTime;

//////////////////////////////////
//polaczenie wifi

const char* ssid="AndroidAP";
const char* password="1234abcd";
const char* ssid1="T-Mobile-B528-F48D";
const char* password1="123asd123";
ESP8266WebServer server(80);
const char* host="192.168.43.92";

/////////////////////////////////////////

void setup() {
  Serial.begin(115200); //port szeregowy  
///////////////////////////wyswietlacz pin//////////////////
  Wire.begin(LCD_SDA_PIN, LCD_SCL_PIN);
  lcd.backlight();
  lcd.begin(16,2);
  lcd.setCursor(0,0);

  //////////////////////////////////////////////////////////
  ////////////////////////Laczenie z WiFi///////////////////
  WiFi.begin(ssid1,password1);
  Serial.println("");
  while(WiFi.status() !=WL_CONNECTED)
  {
    lcd.setCursor(0,0);
    lcd.print(WiFi.localIP());
    delay(15000);
  Serial.print(".");
  lcd.setCursor(0,0);
  lcd.print("nie polaczono");
    lcd.setCursor(0,1);
  lcd.print("Z WiFi");
    delay(1000);
    lcd.clear();
    //  WiFi.begin(ssid1,password1);
  //if(WiFi.status()==WL_CONNECTED){
    
 // }
//  else{
//        lcd.setCursor(0,0);
//    lcd.print(WiFi.localIP());
//    delay(15000);
//  Serial.print(".");
//  lcd.setCursor(0,0);
//  lcd.print("nie polaczono");
 //   lcd.setCursor(0,1);
//  lcd.print("Z WiFi");
//    delay(1000);
 //   lcd.clear();
 // }        
  }
  Serial.print("IP adress:");
  Serial.println(WiFi.localIP());
  delay(400);
  Serial.println(F("BME280 test"));
  lcd.setCursor(0,0);
  lcd.print("IP adress:");
  lcd.setCursor(0,1);
  lcd.print(WiFi.localIP());
  delay(2000);
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("ssid:");
  lcd.setCursor(0,1);
  lcd.print(ssid);
  delay(5000);
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print(F("BME280 test"));
 
  //////////////////////podlaczenie czujnika/////////////
  bool status;
  status = bme.begin(0x76); 
  if (!status) {
  Serial.println("Could not find a valid BME280 sensor, check wiring!");
  lcd.setCursor(0,0);
  lcd.print("Could not find");
  lcd.setCursor(0,1);
  lcd.print("a valid BME280 sensor");
  delay(5000);
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("check wiring!");
  delay(5000);
    while (1);
  }
else{
  Serial.println("-- Default Test --"); lcd.setCursor(0,0); lcd.print("-- Default Test ");}
  delayTime = 1000;
  
  Serial.println();
  /////////////////////////
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Polaczenia sprawdzone");
  delay(1000);
  lcd.clear();
    lcd.setCursor(0,0);
  lcd.print("Internetowy");
      lcd.setCursor(0,1);
  lcd.print("Czujnik");
  delay(1000);
  lcd.clear();
      lcd.setCursor(0,0);
  lcd.print("Modul WiFi");
      lcd.setCursor(0,1);
  lcd.print("ESP8266");
  delay(1000);
  lcd.clear();
        lcd.setCursor(0,0);
  lcd.print("CZujnik");
      lcd.setCursor(0,1);
  lcd.print("BME280");
  delay(1000);
  lcd.clear();
/////////////////////////////lcd wynik z czujnika/////////////////////////
  lcd.backlight();
  lcd.begin(16, 2);
  lcd.print(WiFi.localIP());
  lcd.setCursor(0, 0);
  lcd.print("T=");
  lcd.setCursor(10,0);
  lcd.print("H");
  lcd.setCursor(0, 1);
  lcd.print("P=");
  ///////////////////////////////pobieranie czasu////
  configTime(gmtOffset_sec, daylightOffset_sec, ntpServer);
  /////////////////////////////
}

char text[13]; 
void loop() {  
printValues();
delay(delayTime);
//////////czas////////////
time_t rawtime;
  struct tm * timeinfo;
  time (&rawtime);
  timeinfo = localtime (&rawtime);
  strftime (buffer,80,"%H:%M",timeinfo);
  ////////////////////////////
  String a = buffer;
  String czujnik1="czujnik nr 1";
  String a1=md5(a);
    String ciag= md5(czujnik1);
    String lacz=a1+ciag;
      Serial.println(buffer);
  Serial.println(ciag);
  Serial.println(a);
  Serial.println(lacz);
  delay(200);
/////////////////////////////////Wysylanie POST///////////////////////////////////////////////
HTTPClient http;
  float temperature = bme.readTemperature();  
  float humidity    = bme.readHumidity();     
  float pressure    = bme.readPressure()/100.0F;    
  float altitude_   = bme.readAltitude(1013.25); 
String temperature1,humidity1,pressure1,ciag1,postData;
temperature1=String(temperature);
humidity1=String(humidity);
pressure1=String(pressure);
ciag1=String(lacz);
postData="temperatura="+temperature1+"&wilgotnosc="+humidity1+"&cisnienie="+pressure1+"&ciag="+ciag1;
http.begin("http://192.168.8.128/projekt/test/czujnik.php");
http.addHeader("Content-Type","application/x-www-form-urlencoded");
  int httpCode = http.POST(postData); 
  String payload = http.getString();
  Serial.println(httpCode);   
  Serial.println(payload);     
  http.end(); 
  delay(5000);
////////////////////////////////////////////////////////////Koniec loop///////////////////////////////////////
/////////////////////////////////////////Rozpaczecie od nowa petli///////////////////////////////////////////
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////Wyswietlacz LCD////////////////////////////////////////////////
void printValues() {


  ///////////////////////////////uzmiennnienie danych////////////////////////////////////
  float temperature = bme.readTemperature();  
  float humidity    = bme.readHumidity();     
  float pressure    = bme.readPressure();    
  float altitude_   = bme.readAltitude(1013.25); 
  
  //////////////Wyswietlanie na porcie szeregowym///////////////////////////////////////////////////////
  Serial.print("Temperature = ");
  Serial.print(bme.readTemperature());
  Serial.println(" *C");
  Serial.print("Pressure = ");
  Serial.print(bme.readPressure() / 100.0F);
  Serial.println(" hPa");
  Serial.print("Approx. Altitude = ");
  Serial.print(bme.readAltitude(SEALEVELPRESSURE_HPA));
  Serial.println(" m");
  Serial.print("Humidity = ");
  Serial.print(bme.readHumidity());
  Serial.println(" %");
  Serial.println();

///////////////////////////////Wyswietlanie na LCD////////////////////////////////////////////////
  sprintf(text, "%d.%02u%cC", (int)temperature, (int)(temperature * 100)%100, 223);
  lcd.setCursor(2, 0);
  lcd.print(text);
  sprintf(text, "%d.%02u %%", (int)humidity, (int)(humidity * 100)%100);
  lcd.setCursor(11, 0);
  lcd.print(text);
  sprintf(text, "%u.%02u hPa ", (int)(pressure / 100), (int)((uint32_t)pressure % 100));
  lcd.setCursor(2, 1);
  lcd.print(text);
  Serial.println();
  delay(10000); //odswiezanie co 10sekund
  }
