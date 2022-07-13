#ifndef __RECTANGLE_H_
#define __RECTANGLE_H_
 
#include "shape.h"
 
class Rectangle : public Shape {
private:
   int length;
   int width;
 
public:
   Rectangle(int length = 1, int width = 1, const string& color = "red");

   Rectangle(const Rectangle&);

   int getLength() const;
   void setLength(int length);

   int getWidth() const;
   void setWidth(int width);

   double getArea() const;
   double getPerimeter() const;

   string toString() const;
};
 
#endif // __RECTANGLE_H_