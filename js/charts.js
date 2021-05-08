$("#chart-container").insertFusionCharts({
    type: "doughnut2d",
    width: "100%",
    height: "100%",
    dataFormat: "json",
    dataSource: {
      chart: {
        caption: "Android Distribution for our app",
        enableSmartLabels: false,
        subcaption: "For all users in 2017",
        showpercentvalues: "1",
        defaultcenterlabel: "Android Distribution",
        aligncaptionwithcanvas: "0",
        captionpadding: "0",
        decimals: "0",
        plottooltext:
          "<b>$percentValue</b> of our Android users are on <b>$label</b>",
        
        theme: "fusion"
      },
      data: [
        {
          color: "#29577b",
          label: "Ice Cream Sandwich",
          value: "18900"
        },
        {
          color:"#35c09c",
          label: "Jelly Bean",
          value: "5300"
        },
        {
          color:"#f6ce49",
          label: "Kitkat",
          value: "10500"
        },
        {
          color:"#f7a35c",
          label: "Lollipop",
          value: "1900"
        }
        
      ]
    }
  });
  