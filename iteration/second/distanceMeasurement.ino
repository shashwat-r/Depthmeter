#include <math.h>
const int led = 13;
const int trig = 9;
const int echo = 10;
const int delayy=10;
float duration;
float distance;
float error;
int count = 100;
void setup() {
  pinMode(led, OUTPUT);
  pinMode(trig, OUTPUT);
  pinMode(echo, INPUT);
  Serial.begin(9600);
}
void loop() {
  int blinksps=10*delayy;
  digitalWrite(trig, LOW);
  delayMicroseconds(2);
  digitalWrite(trig, HIGH);
  delayMicroseconds(10);
  digitalWrite(trig, LOW);
  
  duration = pulseIn(echo, HIGH);
  distance= duration*0.034/2;
  error=0.00882724*distance+(0.981084);
  distance+=error;
  //Serial.print(" \t");
  Serial.println(distance);
  if(distance<=10){
    for(int i;i<blinksps;i++){
      digitalWrite(led, HIGH);
      delay(50);
      digitalWrite(led, LOW);
      delay(50);
    }
  }
  else{
     delay(1000*delayy);
  }
  //count--;
  //if(count==0)exit(0);
}
