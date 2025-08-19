#include <stdio.h>
#include <conio.h>
#include <math.h>
#define f(x, y) 2 * y / x
int main()
{
    float x, xp, x0, y0, y, h;
    printf("Enter initial values of x & y \n");
    scanf("%f%f", &x0, &y0);
    printf("Enter x at which function to be Evaluated\n");
    scanf("%f", &h);
    y = y0;
    x = x0;
    for (x = x0; x < xp; x = x + h)
    {
        y = y + f(x, y) * h;
    }
    printf("Function value at x=%f is %f\n", xp, y);
    getch();
    return 0;
}
