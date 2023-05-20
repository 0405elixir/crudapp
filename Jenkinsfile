pipeline {

  agent {
    kubernetes {
      yamlFile 'builder.yaml'
    }
  }
environment {
      PROJECT_NAME = "kuber"
      OWNER_NAME   = "Artem Kalinin"
    }
  stages {

    stage('Deploy App to Kubernetes') {
      steps {
        container('kubectl') {
          withCredentials([file(credentialsId: 'mykubeconfig', variable: 'KUBECONFIG')]) {
            sh 'kubectl delete namespace crud'
            sh 'kubectl create ns crud'
            sh 'kubectl apply -f ./manifests -n crud'
          }
        }
      }
     } 
    
      stage('вывод  списка , имени и владельца') {
        steps {
            sh "ls -la"
            echo "Privet ${PROJECT_NAME}"
            echo "Owner is ${OWNER_NAME}"
         }
        
     stage('Test1') {
      steps {
        script {
          echo "Start of Stage Test1"
          echo 'Job Name: ' + env.JOB_NAME //   вывести имя проекта в Jenkins 
           echo "Privet ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) {
            echo 'Name is correct'
          }
          else {
            sh "echo 'Name is not correct'"
            error('Name verification failed')
          }
        }
       } 
      }
        
     stage('Test2') {
      steps {
        script {
          echo "Start of Stage Test2"
          echo 'USER Name: ' + env.P4_USER //   вывести имя узла в Jenkins 
           echo "Privet ${OWNER_NAME}"
           if (env.P4_USER == OWNER_NAME) {
            echo 'Name is correct'
           }
           else {
           sh "echo 'Name is not correct'"
           error('Name verification failed')
           }
         }
       }
      }
        
  }
}
