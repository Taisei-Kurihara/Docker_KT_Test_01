FROM ubuntu:22.04

RUN apt-get update && apt-get install -y \
    openssh-server sudo \
    vim \
    && rm -rf /var/lib/apt/lists/*

# SSH ディレクトリ作成
RUN mkdir /var/run/sshd

# dev ユーザー作成
RUN useradd -m -s /bin/bash dev && echo "dev:dev" | chpasswd && adduser dev sudo

# root もログイン可能にする（必要な場合）
RUN echo 'root:root' | chpasswd

# SSH 設定
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config \
    && sed -i 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' /etc/pam.d/sshd

EXPOSE 22
CMD ["/usr/sbin/sshd", "-D"]

#ホスト名: localhost
#ポート: 2222
#ユーザー名: root
#パスワード: root