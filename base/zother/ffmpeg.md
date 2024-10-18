#### 安装

> ffmpeg的官方网站是：[http://ffmpeg.org/](https://link.zhihu.com/?target=http%3A//ffmpeg.org/)
>
> 版本：ffmpeg-7.0.2-essentials_build.7z	（自行根据实际情况选择系统及版本，我这里是windows11）

1. 解压到安装目录
2. bin目录添加到环境变量



#### 合并视频

示例视频`1.mp4`,`2.mp4`,`3.mp4`

```sh
# 命令
# -f concat 表示使用合并视频的功能。
# -i input.txt 指定一个包含视频文件列表的文本文件（input.txt）。
# output.mp4 是合并后的输出文件。
ffmpeg -f concat -i input.txt -c copy output.mp4
```

input.txt内容：

```
file '1.mp4'
file '2.mp4'
file '3.mp4'
```



#### 合并音频和视频

示例音频`audio.m4s`，视频为`video.m4s`

```sh
#cmd到音视频目录，执行合并命令：
ffmpeg -i "audio.m4s" -i "video.m4s" -c copy "output.mp4"

```

