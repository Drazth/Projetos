import random

n = list(range(1,10))
while True:
    n_certo = random.choice(n)
    print("escolha um numero de 1 a 10")
    tentativa=int(input("digite um numero: "))
    
    if tentativa==n_certo:
        
            print(f"Você escolheu {tentativa}. Você perdeu!")
            n.remove(tentativa)
            
            if not n:
                print(f"Você esgotou todos os números! Parabéns!")          
                
    else:
        print(f"Você escolheu {tentativa}. Continue tentando!")