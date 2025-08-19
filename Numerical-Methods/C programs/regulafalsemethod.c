#include <stdio.h>
#include <math.h>

#define EPSILON 0.0001 // Error tolerance

// Example function f(x) = x^3 - x - 1
double f(double x)
{
    return x * x * x - x - 1;
}

void regula_falsi(double a, double b)
{
    if (f(a) * f(b) >= 0)
    {
        printf("Invalid interval. f(a) and f(b) must have opposite signs.\n");
        return;
    }

    double c;
    int step = 1;

    printf("Step\t a\t\t b\t\t c\t\t f(c)\n");

    do
    {
        c = (a * f(b) - b * f(a)) / (f(b) - f(a));

        printf("%d\t %.6f\t %.6f\t %.6f\t %.6f\n", step, a, b, c, f(c));

        if (fabs(f(c)) < EPSILON)
            break;

        if (f(a) * f(c) < 0)
            b = c;
        else
            a = c;

        step++;
    } while (1);

    printf("\nApproximate Root: %.6f\n", c);
}

int main()
{
    double a, b;

    printf("Enter the interval (a, b): ");
    scanf("%lf %lf", &a, &b);

    regula_falsi(a, b);

    return 0;
}
