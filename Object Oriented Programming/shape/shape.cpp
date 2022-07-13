#include "shape.h"

#include <iostream>
#include <sstream>
 

Shape::Shape(const string& color, bool filled) {
  this->color = color;
  this->filled = filled;
}

Shape::Shape(const Shape& s) {
  setColor(s.color);
  setFilled(s.filled);
}

string Shape::getColor() const {
  return color;
}

void Shape::setColor(const string& color) {
  this->color = color;
}

bool Shape::isFilled() const {
  return filled;
}

void Shape::setFilled(bool v) {
  filled = v;
}

double Shape::getArea() const {
  return 0;
}

double Shape::getPerimeter() const {
  return 0;
}

string Shape::toString() const {
  ostringstream oss;

  oss << "Shape[" << "culoare=" << color
      << ", este plin=" << filled << "]";

  return oss.str();
}


