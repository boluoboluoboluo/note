package main

import(
	"net/http"
	"strings"
	"github.com/gin-gonic/gin"
)

func main(){
	r := gin.Default()
	r.GET("/user/:name/*action",func(c *gin.Context){
		name := c.Param("name")
		action := c.Param("action")
		//截取
		action = strings.Trim(action,"/")
		c.String(http.StatusOK,name+"is"+action)
	})
	
	r.Run(":8003")
}