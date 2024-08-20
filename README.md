# Sistema de Gerenciamento de Projetos

<details>
  <summary><strong>Escopo</strong></summary>

### Descrição Geral
Será desenvolvido um sistema para o gerenciamento de projetos, onde cada usuário logado terá a possibilidade de entrar ou criar sua própria equipe. As equipes terão um número máximo de membros definido pelo usuário criador (gerente). Cada equipe poderá ter um ou mais projetos criados pelo usuário criador (gerente). Usuários comuns poderão se candidatar aos projetos mediante aprovação do usuário criador (gerente), que será responsável por atribuir tarefas a cada usuário comum.

### Objetivos Gerais
- Facilitar a organização e divisão de equipes.
- Acompanhar o progresso dos projetos.
- Atribuir de forma simples e clara as tarefas a cada usuário relacionado ao projeto.
- Facilitar o contato entre equipes.

### Metas SMART

**Específicas:**
- Desenvolver um sistema de cadastro e autenticação de usuários.
- Desenvolver hierarquia para usuários: 
  - Usuário comum;
  - Gerente;
  - Admin.
- Garantir a segurança dos dados e integridade das funcionalidades.
- Permitir a criação e o gerenciamento de equipes e tarefas.

**Mensuráveis:**
- Atingir 1000 usuários simultâneos sem perda de desempenho.
- Cada usuário deve receber até 3 tarefas por vez.

**Atingíveis:**
- Criar hierarquia entre usuários.
- Garantir que os usuários acessem as tarefas atribuídas a eles.
- Garantir a realização do cadastro e login para os usuários.
- Realizar CRUD (Create, Read, Update, Delete) direcionado às tarefas.
- Criar equipes e projetos.

**Relevante:**
- Facilitar o contato entre equipes.
- Distribuir de forma organizada as tarefas.

**Temporal:**
- Deve ser concluído em 1 mês.
- Reuniões periódicas.

### Recursos
- **Linguagem de Programação:** PHP
- **Framework:** Laravel
- **Banco de Dados:** PostgreSQL
- **Design de Interfaces:** Figma
- **IDE para Desenvolvimento:** VSCode
- **Documentação:** README (GitHub)
- **Controle de Versão:** GitHub

### Análise de Riscos

**Riscos e Soluções:**
1. **Falta de Comunicação:**
   - Solução: Reuniões semanais para verificação de progresso.
2. **Quedas de Energia:**
   - Solução: Contatar o provedor e utilizar notebooks.
3. **Oscilação de Internet:**
   - Solução: Contatar o provedor.
4. **Atraso nas Entregas:**
   - Solução: Verificar com a equipe as possíveis causas, atualizar o cronograma e resolver problemas.
5. **Instabilidade na Utilização de Recursos:**
   - Solução: Utilizar recursos alternativos, e.g., se Figma cair, usar Canva; se VSCode cair, usar Eclipse ou Codespace.
6. **Adversidade com Membros da Equipe:**
   - Solução: Distribuir atividades para outros integrantes da equipe e atualizar o cronograma conforme necessário.

</details>

<details>
  <summary><strong>Cronograma do Projeto</strong></summary>

### Semana 1: Planejamento e Preparação
- **Dia 1-2:** Reunião de Kickoff
  - Definir objetivos e alinhar expectativas.
  - Revisar escopo e metas SMART.
  - Dividir tarefas e responsabilidades.
  
- **Dia 3-4:** Análise de Requisitos
  - Recolher e documentar requisitos detalhados.
  - Definir funcionalidades e prioridades.
  
- **Dia 5:** Planejamento do Projeto
  - Criar um plano de trabalho detalhado.
  - Estabelecer cronograma e marcos.
  
- **Dia 6-7:** Preparação do Ambiente
  - Configurar ferramentas de desenvolvimento (VSCode, GitHub).
  - Configurar o banco de dados PostgreSQL e o ambiente Laravel.

### Semana 2: Design e Protótipos
- **Dia 8-10:** Design de Interface
  - Criar wireframes e protótipos no Figma.
  - Revisar e aprovar designs com a equipe.

- **Dia 11-12:** Definição da Arquitetura do Sistema
  - Definir estrutura de banco de dados.
  - Planejar a arquitetura de backend e frontend.

- **Dia 13-14:** Revisão e Ajustes
  - Revisar protótipos e arquitetura.
  - Fazer ajustes necessários com base no feedback.

### Semana 3: Desenvolvimento
- **Dia 15-17:** Desenvolvimento de Funcionalidades Básicas
  - Implementar autenticação de usuários e hierarquia (comum, gerente, admin).
  - Criar CRUD para equipes e projetos.

- **Dia 18-19:** Desenvolvimento de Funcionalidades Avançadas
  - Implementar gerenciamento de tarefas e atribuição.
  - Desenvolver interface de usuário para visualização e gerenciamento de projetos.

- **Dia 20-21:** Integração e Testes Iniciais
  - Integrar front-end e back-end.
  - Realizar testes iniciais de funcionalidades.

### Semana 4: Testes, Ajustes e Lançamento
- **Dia 22-24:** Testes e Depuração
  - Realizar testes de usabilidade e correção de bugs.
  - Validar funcionalidades e desempenho.

- **Dia 25-26:** Revisão Final e Documentação
  - Completar documentação (README no GitHub).
  - Preparar tutoriais e material de apoio.

- **Dia 27-28:** Preparação para Lançamento
  - Revisar e ajustar o cronograma de lançamento.
  - Configurar servidores e ambiente de produção.

- **Dia 29-30:** Lançamento e Feedback
  - Lançar o sistema para os usuários.
  - Coletar feedback inicial e resolver quaisquer problemas críticos.

</details>

<details>
  <summary><strong>Diagramas para Desenvolvimento</strong></summary>

### Diagrama de Classe:
![Diagrama de Classe](GerenciaProjetos/diagrams/diagrama_classe.png)

### Diagrama de Uso:
![Diagrama de Uso](GerenciaProjetos/diagrams/diagrama_uso.png)

### Diagrama de Fluxo:
![Diagrama de Fluxo](GerenciaProjetos/diagrams/diagrama_fluxo_1.png)
![Diagrama de Fluxo](GerenciaProjetos/diagrams/diagrama_fluxo_2.png)

</details>
