
const char buttonX = 5;    // choose the pin for the LED
const char buttonY = 6;
const char buttonZ = 7;
const char buttonZZ = 8;
bool pressed = false;


void setup()
{
  Serial.begin(115200);
  pinMode(buttonX, INPUT_PULLUP);
  pinMode(buttonY, INPUT_PULLUP);
  pinMode(buttonZ, INPUT_PULLUP);
  pinMode(buttonZZ, INPUT_PULLUP);
  
}

void loop()
{
  bool currentState = digitalRead(buttonX);
  bool currentState2 = digitalRead(buttonY);
  bool currentState3 = digitalRead(buttonZ);
  bool currentState4 = digitalRead(buttonZZ);

  if(currentState == pressed) {
  Serial.println("hello");
  
  while(digitalRead(buttonX) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState2 == pressed) {
  Serial.println("there");
  while(digitalRead(buttonY) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState3 == pressed) {
  Serial.println("mister");
  while(digitalRead(buttonZ) == pressed)
  {
    delay(300);
  }
  }
  else if(currentState4 == pressed) {
  Serial.println("!");
  while(digitalRead(buttonZZ) == pressed)
  {
    delay(300);
  }
  }
}