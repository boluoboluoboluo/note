package main

import(
	"net/http"
	"fmt"
	"github.com/gin-gonic/gin"
)

func main(){
	r := gin.Default()
	r.POST("/form",func(c *gin.Context){
		types := c.DefaultPostForm("type","post")
		username := c.PostForm("username")
		password := c.PostForm("userpassword")
		c.String(http.StatusOK,fmt.Sprintf("username:%s,password:%s,type:%s",username,password,types))
	})
	
	r.Run(":8003")
}