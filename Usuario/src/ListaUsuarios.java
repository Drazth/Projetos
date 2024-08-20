import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class ListaUsuarios {
    private Usuario cabeca;

    public void inserirNaLista() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite o nome do usuario:");
        String nome = scanner.nextLine();

        System.out.println("Digite a idade do usuario:");
        int idade = Integer.parseInt(scanner.nextLine());

        System.out.println("Digite o sexo do usuario (M/F):");
        char sexo = scanner.nextLine().charAt(0);

        Usuario usuario = new Usuario(nome, idade, sexo);
        if (cabeca == null) {
            cabeca = usuario;
        } else {
            Usuario atual = cabeca;
            while (atual.getProximo() != null) {
                atual = atual.getProximo();
            }
            atual.setProximo(usuario);
            usuario.setAnterior(atual);
        }

        
    }
    public void ordenaPorNome() {
        cabeca = mergeSort(cabeca);
    }

    private Usuario mergeSort(Usuario usuario) {
        if (usuario == null || usuario.getProximo() == null) {
            return usuario;
        }

        Usuario meio = getMiddle(usuario);
        Usuario proximoDoMeio = meio.getProximo();
        meio.setProximo(null);

        Usuario esquerda = mergeSort(usuario);
        Usuario direita = mergeSort(proximoDoMeio);

        return merge(esquerda, direita);
    }

    private Usuario getMiddle(Usuario usuario) {
        if (usuario == null) {
            return usuario;
        }

        Usuario rapido = usuario.getProximo();
        Usuario lento = usuario;

        while (rapido != null) {
            rapido = rapido.getProximo();
            if (rapido != null) {
                lento = lento.getProximo();
                rapido = rapido.getProximo();
            }
        }
        return lento;
    }

    private Usuario merge(Usuario esquerda, Usuario direita) {
        Usuario resultado = null;

        if (esquerda == null) {
            return direita;
        }
        if (direita == null) {
            return esquerda;
        }

        if (esquerda.getNome().compareToIgnoreCase(direita.getNome()) <= 0) {
            resultado = esquerda;
            resultado.setProximo(merge(esquerda.getProximo(), direita));
            if (resultado.getProximo() != null) {
                resultado.getProximo().setAnterior(resultado);
            }
        } else {
            resultado = direita;
            resultado.setProximo(merge(esquerda, direita.getProximo()));
            if (resultado.getProximo() != null) {
                resultado.getProximo().setAnterior(resultado);
            }
        }
        return resultado;
    }

    public void removerDaLista(Usuario usuario) {
        if (usuario.getAnterior() != null) {
            usuario.getAnterior().setProximo(usuario.getProximo());
        } else {
            cabeca = usuario.getProximo();
        }
        if (usuario.getProximo() != null) {
            usuario.getProximo().setAnterior(usuario.getAnterior());
        }
    }

    public List<List<Usuario>> separarPorSexo() {
        List<Usuario> usuariosMasculinos = new ArrayList<>();
        List<Usuario> usuariosFemininos = new ArrayList<>();

        Usuario atual = cabeca;
        while (atual != null) {
            Usuario proximo = atual.getProximo();
            switch (atual.getSexo()) {
                case 'M' -> usuariosMasculinos.add(atual);
                case 'm' -> usuariosMasculinos.add(atual);
                case 'F' -> usuariosFemininos.add(atual);
                case 'f' -> usuariosFemininos.add(atual);
            }
            
            atual = proximo;
        }
        
        this.cabeca = null;
        
        usuariosMasculinos.forEach(this::inserirNaLista);
        usuariosFemininos.forEach(this::inserirNaLista);

        return List.of(usuariosMasculinos, usuariosFemininos);
    }
    
    private void inserirNaLista(Usuario usuario) {
        if (cabeca == null) {
            cabeca = usuario;
        } else {
            Usuario atual = cabeca;
            while (atual.getProximo() != null) {
            atual = atual.getProximo();
        }
        
    }
}
    public void imprimirLista() {
        Usuario atual = cabeca;
        while (atual != null) {
            System.out.println("Nome: " + atual.getNome() + ", Idade: " + atual.getIdade() + ", Sexo: " + atual.getSexo());
            atual = atual.getProximo();
        }
    }

    public static void main(String[] args) {
    ListaUsuarios lista = new ListaUsuarios();
    boolean inserirUsuario = true;
    
    try (Scanner scanner = new Scanner(System.in)) {
        while (inserirUsuario) {
            System.out.println("Deseja inserir um novo usuario? (sim/nao)");
            String resposta = scanner.nextLine();
            
            if (resposta.equalsIgnoreCase("sim")) {
                 
                lista.inserirNaLista();
            } else if(resposta.equalsIgnoreCase("nao")) {
                inserirUsuario = false;
                
            }
           
        }
        
        lista.ordenaPorNome();
        
        System.out.println("Lista ordenada:");
        lista.imprimirLista();
        
        List<List<Usuario>> listasSeparadas = lista.separarPorSexo();
        
        System.out.println("Lista de homens:");
        listasSeparadas.get(0).forEach(usuario -> System.out.println("Nome: " + usuario.getNome() + ", Idade: " + usuario.getIdade() + ", Sexo: " + usuario.getSexo()));
        
        System.out.println("Lista de mulheres:");
        listasSeparadas.get(1).forEach(usuario -> System.out.println("Nome: " + usuario.getNome() + ", Idade: " + usuario.getIdade() + ", Sexo: " + usuario.getSexo()));
    }
}
}