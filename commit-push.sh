#!/usr/bin/env bash

    git status
    echo "--------------------------------"
    git add .
    git status
    echo "--------------------------------"
    echo "enter your commit message" >&2
    read COMMIT_MESSAGE
    echo "--------------------------------"
    git commit -m " ${COMMIT_MESSAGE} "
    echo "--------------------------------"
    git status
    echo "--------------------------------"
    echo "Do you want to push your work ? y / n" >&2
    read PUSH_DECISION
    echo "--------------------------------"
    if [[ ${PUSH_DECISION} = "y" ]]; then

      git push
else
      git status
fi
