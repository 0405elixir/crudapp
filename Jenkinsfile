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
    
      stage('вывод информации') {
        steps {
            sh "ls -la"
            echo "Privet ${PROJECT_NAME}"
            echo "Owner is ${OWNER_NAME}"
          echo 'Job Name: ' + env.JOB_NAME
          echo 'USER Name: ' + env.P4_USER
          echo 'NODE Name: ' + env.NODE_NAME
        }
      }
        
     stage('Тест имени проекта') {
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
        
     stage('Тест наличия файла') {
      steps {
        script {
          echo "Start of Stage Test2"
          if test -f $docker-compose.yaml  {
          echo "файл существует"
          }
           else {
           echo "Файл не существует"
           error('Name verification failed')
           }
         }
       }
      }
        
  }
}
