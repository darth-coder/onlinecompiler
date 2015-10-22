#include<stdio.h>
#include<sys/shm.h>
#include<sys/types.h>
#include<sys/ipc.h>
int main()
{
    char t;
    scanf("%c",&t);
    printf("%c",t);
    return 0;
}