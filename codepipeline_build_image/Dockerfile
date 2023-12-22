FROM ubuntu:22.04

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive TZ=Etc/UTC apt-get -y install tzdata
RUN  apt-get install composer  -y
RUN  apt-get install php-xml php-curl php-zip -y
RUN apt-get install php-mbstring php-pgsql php-pear php-dev libhiredis-dev -y
RUN apt-get install  php-intl -y

RUN curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash 
RUN . ~/.bashrc ; nvm install 21.2



SHELL ["/bin/bash", "--login", "-c"]
CMD [ "echo", "$PATH" ]
CMD [ "bin/bash" ]
CMD [ "echo", "$PATH" ]
RUN ls
#RUN ~/.bashrc
#RUN nvm install 21.2
#RUN ls -al

#WORKDIR /app

#COPY composer.json composer.lock /app/
#
#RUN composer clearcache && \
#    composer install 
#
#FROM node:8 as node
#
#WORKDIR /app
#
#COPY package.json .
#COPY package-lock.json .
#COPY angular.json .
#COPY tsconfig.json .
#COPY resources resources/
#
#RUN npm install -g @angular/cli@6.0.8 pm2@3.2.0 @angular-devkit/build-angular@0.13.8
#
#RUN npm install
#
#ARG DEPLOY_ENV
## use the value to set the ENV var default
#ENV DEPLOY_ENV=$DEPLOY_ENV
#
#RUN echo ng build --configuration=$DEPLOY_ENV
#RUN ng build --configuration=$DEPLOY_ENV
