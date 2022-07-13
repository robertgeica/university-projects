#include "rectangle.h"

#include <sstream>
 

Rectangle::Rectangle(int length, int width, const string& color)
                     : Shape(color), length(length), width(width) { 
}
 
int Rectangle::getLength() const {
   return length;
}

int Rectangle::getWidth() const {
   return width;
}

void Rectangle::setLength(int length) {
  this->length = length;
}

void Rectangle::setWidth(int width) {
  this->width = width;
}

double Rectangle::getArea() const {
   return length * width;
}

double Rectangle::getPerimeter() const {
  return 2 * (length + width);
}

string Rectangle::toString() const {
  ostringstream oss;

  oss << "Dreptunghi[" + Shape::toString() + ", length=" << length 
      << ", width=" << width << "]";

  return oss.str();
}
