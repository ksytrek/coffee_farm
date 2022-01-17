#include <SoftwareSerial.h>
SoftwareSerial BTSerial(9, 10);

int dir1PinA = 2;
int dir2PinA = 3;
int speedPinA = 6;
int dir1PinB = 4;
int dir2PinB = 5;
int speedPinB = 7;

void setup() 
{   

  Serial.begin(9600);
  pinMode(dir1PinA,OUTPUT);
  pinMode(dir2PinA,OUTPUT);
  pinMode(speedPinA,OUTPUT);
  pinMode(dir1PinB,OUTPUT);
  pinMode(dir2PinB,OUTPUT);
  pinMode(speedPinB,OUTPUT);
  pinMode(8,OUTPUT);
  digitalWrite(8, HIGH);
  Serial.begin(9600);
  BTSerial.begin(9600); 
}


void loop() 
{  
  if (BTSerial.available())
    Serial.write(BTSerial.read());

  if (Serial.available())
    BTSerial.write(Serial.read());

  if (BTSerial.available() > 0) {

    int inByte = BTSerial.read();
    int speed;
    switch (inByte) {

    case 'F':

      analogWrite(speedPinA, 255);
      analogWrite(speedPinB, 255);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir1PinB, HIGH);
      digitalWrite(dir2PinA, HIGH);
      digitalWrite(dir2PinB, LOW);
      Serial.println("Motor 1 Forward");
      Serial.println("Motor 2 Forward");
      Serial.println("   "); 

      break;



    case 'S': 

      analogWrite(speedPinA, 0);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir2PinA, HIGH);
      Serial.println("Motor 1 Stop");
      analogWrite(speedPinB, 0);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Stop");
      Serial.println("   ");

      break;

    case 'B':

      analogWrite(speedPinA, 255);
      digitalWrite(dir1PinA, HIGH);
      digitalWrite(dir2PinA, LOW);
      Serial.println("Motor 1 Back");
      analogWrite(speedPinB, 255);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Back");
      Serial.println("   ");

      break;

    case 'L':

      analogWrite(speedPinA, 0);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir2PinA, HIGH);
      Serial.println("Motor 1 Left");
      analogWrite(speedPinB, 255);
      digitalWrite(dir1PinB, HIGH);
      digitalWrite(dir2PinB, LOW);
      Serial.println("Motor 2 Left");
      Serial.println("   ");

      break;

    case 'R':

      analogWrite(speedPinA, 255);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir2PinA, HIGH);
      Serial.println("Motor 1 Right");
      analogWrite(speedPinB, 0);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Right");
      Serial.println("   ");

      break;

    case 'I':

      analogWrite(speedPinA, 150);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir2PinA, HIGH);
      Serial.println("Motor 1 Forward L");
      analogWrite(speedPinB, 255);
      digitalWrite(dir1PinB, HIGH);
      digitalWrite(dir2PinB, LOW);
      Serial.println("Motor 2 Forward L");
      Serial.println("   ");

      break;

    case 'G':

      analogWrite(speedPinA, 255);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir2PinA, HIGH);
      Serial.println("Motor 1 Forward R");
      analogWrite(speedPinB, 150);
      digitalWrite(dir1PinB, HIGH);
      digitalWrite(dir2PinB, LOW);
      Serial.println("Motor 2 Forward R");
      Serial.println("   ");

      break;

    case 'J':

      analogWrite(speedPinA, 200);
      digitalWrite(dir1PinA, HIGH);
      digitalWrite(dir2PinA, LOW);
      Serial.println("Motor 1 Back L");
      analogWrite(speedPinB, 255);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Back L");
      Serial.println("   ");

      break;

    case 'H':

      analogWrite(speedPinA, 255);
      digitalWrite(dir1PinA, HIGH);
      digitalWrite(dir2PinA, LOW);
      Serial.println("Motor 1 Back R");
      analogWrite(speedPinB, 200);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Back R");
      Serial.println("   ");

      break;


    default:



      for (int thisPin = 2; thisPin < 11; thisPin++) 

      {

        digitalWrite(thisPin, LOW);

      }
    }
  }

} 

switch (inByte) {

    case 'F':

      analogWrite(speedPinA, 500);
      analogWrite(speedPinB, 500);
      digitalWrite(dir1PinA, LOW);
      digitalWrite(dir1PinB, HIGH);
      digitalWrite(dir2PinA, HIGH);
      digitalWrite(dir2PinB, LOW);
      Serial.println("Motor 1 Forward");
      Serial.println("Motor 2 Forward");
      Serial.println("   "); 

      break;

    case 'H':

      analogWrite(speedPinA, 500);
      digitalWrite(dir1PinA, HIGH);
      digitalWrite(dir2PinA, LOW);
      Serial.println("Motor 1 Back R");
      analogWrite(speedPinB, 200);
      digitalWrite(dir1PinB, LOW);
      digitalWrite(dir2PinB, HIGH);
      Serial.println("Motor 2 Back R");
      Serial.println("   ");

      break;


    default: