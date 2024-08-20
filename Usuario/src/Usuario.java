class Usuario {
    private String nome;
    private int idade;
    private char sexo;
    private Usuario proximo;
    private Usuario anterior;

    public Usuario(String nome, int idade, char sexo) {
        this.nome = nome;
        this.idade = idade;
        this.sexo = sexo;
        this.proximo = null;
        this.anterior = null;
    }

    public String getNome() {
        return nome;
    }

    public int getIdade() {
        return idade;
    }

    public char getSexo() {
        return sexo;
    }

    public Usuario getProximo() {
        return proximo;
    }

    public void setProximo(Usuario proximo) {
        this.proximo = proximo;
    }

    public Usuario getAnterior() {
        return anterior;
    }

    public void setAnterior(Usuario anterior) {
        this.anterior = anterior;
    }
}