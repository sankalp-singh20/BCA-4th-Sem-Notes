#include <stdio.h>

float v = 0, p, xp;
int n, i;
float x[10], fx[10], h, s;
float fd[10];

int factorial(int num);
int main()
{
    printf("Enter the number of points\n");
    scanf("%d", &n);

    printf("Enter the value at which interpolated value is to be calculated\n");
    scanf("%f", &xp);

    for (i = 0; i < n; i++)
    {
        printf("Enter the value of x and fx at i=%d\n", i);
        scanf("%f %f", &x[i], &fx[i]);
    }

    h = x[1] - x[0];
    s = (xp - x[0]) / h;

    for (i = 0; i < n; i++)
    {
        fd[i] = fx[i];
    }

    for (int j = 1; j < n; j++)
    {
        for (i = n - 1; i >= j; i--)
        {
            fd[i] = (fd[i] - fd[i - 1]);
        }
    }

    v = fd[0];

    for (i = 1; i < n; i++)
    {
        p = 1;
        for (int k = 0; k < i; k++)
        {
            p *= (s - k);
        }
        v += (fd[i] * p) / factorial(i);
    }

    printf("Interpolation value = %f\n", v);
    return 0;
}

int factorial(int num)
{
    if (num <= 1)
        return 1;
    return num * factorial(num - 1);
}
