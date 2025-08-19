#include <stdio.h>
#include <stdlib.h>
#include <math.h>

#define SIZE 10

int main()
{
    double a[SIZE][SIZE + 1], x[SIZE], ratio;
    int i, j, k, n;

    printf("Enter number of variables: ");
    scanf("%d", &n);

    printf("Enter coefficients of Augmented Matrix:\n");
    for (i = 0; i < n; i++)
    {
        for (j = 0; j <= n; j++)
        {
            printf("a[%d][%d] = ", i, j);
            scanf("%lf", &a[i][j]);
        }
    }

    for (i = 0; i < n; i++)
    {
        if (a[i][i] == 0.0)
        {
            printf("Mathematical Error: Division by zero detected!\n");
            exit(1);
        }

        for (j = 0; j < n; j++)
        {
            if (i != j)
            {
                ratio = a[j][i] / a[i][i];
                for (k = 0; k <= n; k++)
                {
                    a[j][k] = a[j][k] - ratio * a[i][k];
                }
            }
        }
    }

    for (i = 0; i < n; i++)
    {
        x[i] = a[i][n] / a[i][i];
    }

    printf("\nSolution:\n");
    for (i = 0; i < n; i++)
    {
        printf("x[%d] = %.3lf\n", i + 1, x[i]);
    }

    return 0;
}
