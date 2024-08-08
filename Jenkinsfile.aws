pipeline {
    agent {
        label 'remote-agent-label' // Label of your remote agent
    }
    stages {
        stage('Checkout') {
            steps {
                // Checkout code from your repository
                git 'https://github.com/your-repository.git'
            }
        }
        stage('Build') {
            steps {
                // Commands to build your project
                sh 'make build'
            }
        }
        stage('Test') {
            steps {
                // Commands to test your project
                sh 'make test'
            }
        }
        stage('Deploy') {
            steps {
                // Commands to deploy your project
                sh 'make deploy'
            }
        }
    }
    post {
        always {
            // Clean up actions
            cleanWs()
        }
    }
}
