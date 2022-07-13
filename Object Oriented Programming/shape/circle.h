#ifndef __CIRCLE_H_
#define __CIRCLE_H_
 
#include "shape.h"
 

class Circle : public Shape {
private:
   int radius;
 
public:
   Circle(int radius = 1, const string & color = "red");
   Circle(const Circle&);

   int getRadius() const;
   void setRadius(int radius);
   
   double getArea() const;
   double getPerimeter() const;

   string toString() const;
};
 
#endif // __CIRCLE_H_