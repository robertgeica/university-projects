#include "circle.h"
#include <sstream>

#define PI 3.14159265
 

Circle::Circle(int radius, const string & color)
               : Shape(color) { 
  this->radius = radius;
}
 
int Circle::getRadius() const {
  return radius;
}
 
void Circle::setRadius(int newRadius) {
  radius = newRadius;
}

double Circle::getArea() const {
  return PI * radius * radius;
}

double Circle::getPerimeter() const {
  return 2 * PI * radius;
}

string Circle::toString() const {
  ostringstream oss;

  oss << "Circle[" + Shape::toString() + ", raza=" << radius;

  return oss.str();
}
 
