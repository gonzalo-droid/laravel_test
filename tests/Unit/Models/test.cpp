//Servo motor 
#include<Servo.h> 
Servo motor; 

#include <LiquidCrystal.h>
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

void setup() {
motor.attach(8); 

lcd.begin(16, 2);
lcd.clear();
lcd.setCursor(0, 0);
lcd.print("ANGULO");
}
 
void loop() {
delay(2000);
      
motor.write(90);
lcd.setCursor(11, 0);
lcd.print("90 ");  
delay(1000);
    
motor.write(180);
lcd.setCursor(11, 0);
lcd.print("180"); 
delay(1000);
  
}

