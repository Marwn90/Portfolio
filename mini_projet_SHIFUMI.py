from random import randint
nbCoup=5;
listeRep = [['lezard','papier','Spock'],['papier','spock','pierre'],['spock','pierre','ciseaux'],['pierre','ciseaux','lezard'],['ciseaux','lezard','papier']];

def quiGagne(listeRep, rep1, rep2):
    x=0;
    while x<len(listeRep):
        if(rep1==listeRep[x][0]):
            if(rep2==listeRep[x][1] or rep2==listeRep[x][2]):
                return "gagner utilisateur";
            elif (rep2==listeRep[x][0]):
                return "match null"
            else:
                return "gagner ordi";
        x+=1;
    
def traitementRep(listeRep):
        flag=True;
        while flag:
            repUtilisateur=input("ENTRE VOS CHOIX : ");
            for x in listeRep:
                if(x[0]==repUtilisateur):
                    flag=False;
        print(repUtilisateur);
        return repUtilisateur;
    

def reponseOrdi(listeRep):
    index = randint(0, 4);
    
    print(listeRep[index][0]);
    return listeRep[index][0];
    
def jeux(listeRep, nbCoup):
    x=0;
    gagnant=None;
    while x < nbCoup and gagnant==None:
        x+=1;
        repu=traitementRep(listeRep);
        repo=reponseOrdi(listeRep);
        gagnant=quiGagne(listeRep, repu, repo);
    print(gagnant);
    

def main():
    cont="";
    while cont!="exit":
        jeux(listeRep,nbCoup);
        cont=input("Continue?");

main()