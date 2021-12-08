import 'package:flutter/material.dart';
import 'package:vncitizens_home/src/views/widgets/custom_banner.dart';

class Home extends StatelessWidget {
  List<dynamic> listHomeMenuConfig;

  Home({Key? key, required this.listHomeMenuConfig}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: const PreferredSize(
        preferredSize: Size.fromHeight(200),
        child: CustomBanner(),
      ),
      body: ScrollConfiguration(
        behavior: ScrollConfiguration.of(context).copyWith(scrollbars: false),
        child: GridView.count(
          padding: const EdgeInsets.all(10),
          crossAxisCount: 3,
          crossAxisSpacing: 10,
          mainAxisSpacing: 10,
          children: [
            for (var i = 0; i < listHomeMenuConfig.length; i++)
              if (listHomeMenuConfig[i]['enable'])
                IconButton(
                  icon: Column(
                    children: [
                      SizedBox(
                        child: Image.asset('assets/images/hospital.png'),
                        width: 60,
                        height: 60,
                      ),
                      const Padding(padding: EdgeInsets.only(top: 15)),
                      Text(listHomeMenuConfig[i]['name'],
                          style: const TextStyle(fontSize: 13)),
                    ],
                  ),
                  onPressed: () => Navigator.of(context).pushNamed(
                    listHomeMenuConfig[i]['route'],
                    arguments: [
                      listHomeMenuConfig[i]['name'] + "'s List",
                      listHomeMenuConfig[i]['tagId'],
                    ],
                  ),
                )
          ],
        ),
      ),
    );
  }
}
