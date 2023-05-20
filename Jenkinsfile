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
      stage('Test1') {
        steps {
             sh "ls -la"
            echo "Start of Stage Test..."
            echo "Testing......."
            echo "Privet ${PROJECT_NAME}"
            echo "Owner is ${OWNER_NAME}"
             
         }
       }
     stage('Test2') {
      steps {
        script {
          echo 'Job Name: ' + env.JOB_NAME
          echo "Start of Stage Test..."
          echo "Privet ${PROJECT_NAME}"
          if (env.JOB_NAME == PROJECT_NAME) {
            echo 'Name is correct'
          }
          else {
            sh "echo 'Name is not correct'"
          }
        }
      }
    }
    }

  
}
