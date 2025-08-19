#include <stdio.h>
#include <conio.h>
#include <math.h>
int fact(int n)
{
    if (n == 1)
        return 1;
    else
        return (n * fact(n - 1));
}
int main()
{
    float x, x0, yx0, yx, fdy, sdy, tdy;
    printf("Enter initial values if x & y be:\n");
    scanf("%f%f", &x0, &yx0);
    printf("Enter x at which function to be evaluated\n");
    scanf("%f", &x);
    fdy = (x0) * (x0) + (yx0) * (yx0);
    sdy = 2 * (x0) + 2 * (yx0)*fdy;
    tdy = 2 + 2 * yx0 * sdy + 2 * fdy * fdy;
    yx = yx0 + (x - x0) * fdy + (x - x0) * (x - x0) * sdy / fact(2) + (x - x0) * (x - x0) * (x - x0) * tdy / fact(3);
    printf("Function value at x=%f is %f\n", x, yx);
    getch();
    return 0;
}
