#ifndef __SHAPE_H_
#define __SHAPE_H_
 
#include <string>

using namespace std;
 
class Shape {
  private:
    string color;
    bool filled;
  public:
    Shape(const string & color = "red", bool filled = true);

    Shape(const Shape&);

    string getColor() const;
    void setColor(const string & color);

    bool isFilled() const;
    void setFilled(bool);

    virtual double getArea() const;
    virtual double getPerimeter() const;

    string toString() const;
};
 
#endif