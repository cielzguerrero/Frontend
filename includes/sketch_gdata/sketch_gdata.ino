
#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

char server[] = "192.168.1.16";
IPAddress ip(192,168,1,1); 

EthernetClient client;

const char buttonX = 5;
const char buttonY = 6;
const char buttonZ = 7;
const char buttonZZ = 8;
int gdata;
bool pressed = false;

void setup()
{
  
  Serial.begin(9600);
  pinMode(buttonX, INPUT_PULLUP);
  pinMode(buttonY, INPUT_PULLUP);
  pinMode(buttonZ, INPUT_PULLUP);
  pinMode(buttonZZ, INPUT_PULLUP);

  if (Ethernet.begin(mac) == 0) {
  Serial.println("Failed to configure Ethernet using DHCP");
  Ethernet.begin(mac, ip);
  }
  delay(1000);
}
void loop()
{
  bool currentState = digitalRead(buttonX);
  bool currentState2 = digitalRead(buttonY);
  bool currentState3 = digitalRead(buttonZ);
  bool currentState4 = digitalRead(buttonZZ);

  if(currentState == pressed) {
  Serial.println("Doy Pack");
  gdata = 1;
  sending_to_php();
  while(digitalRead(buttonX) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState2 == pressed) {
  Serial.println("Glass Bottle");
  gdata = 2;
  sending_to_php();
  while(digitalRead(buttonY) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState3 == pressed) {
  Serial.println("Plastic Bottle");
  gdata = 3;
  sending_to_php();
  while(digitalRead(buttonZ) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState4 == pressed) {
  Serial.println("Aluminum");
  gdata = 4;
  sending_to_php();
  while(digitalRead(buttonZZ) == pressed)
  {
    delay(300);
  }
  }
}
void sending_to_php()
{
  if (client.connect(server, 80)) {
    Serial.println("Successfully Connected");
    //HTTP Request
    //THE URL OF LOCALHOST TO SEND DATA FROM SENSOR TO PHPMYADMIN DATABASE
    Serial.print("GET /Frontend/mainPage/mainFinal.php?gdata=");
    client.print("GET /Frontend/mainPage/mainFinal.php?gdata=");
    Serial.println(gdata);
    client.print(gdata);
    client.print(" ");
    client.print("HTTP/1.1");
    client.println();
    client.println("Host: 192.162.1.16");
    client.println("Connection: close");
    client.println();
    
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  delay(100);
}
