import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:vncitizens_home/src/views/widgets/my_banner.dart';

class MenuGrid extends GetView<ConfigurationController> {
  const MenuGrid({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final config = controller.configuration;
    List<dynamic> menuGrid =
        config['menuGrid'] != null ? List.from(config['menuGrid']) : [];

    int count = 3;
    if (MediaQuery.of(context).size.width > 500) {
      count = 5;
    } else {
      count = 3;
    }

    return Scaffold(
      appBar: const PreferredSize(
        preferredSize: Size.fromHeight(200),
        child: MyBanner(),
      ),
      body: ScrollConfiguration(
        behavior: ScrollConfiguration.of(context).copyWith(scrollbars: false),
        child: GridView.count(
          padding: const EdgeInsets.all(10),
          crossAxisCount: count,
          crossAxisSpacing: 10,
          mainAxisSpacing: 10,
          children: [
            for (var i = 0; i < menuGrid.length; i++)
              if (menuGrid[i]['enable'])
                IconButton(
                  icon: Column(
                    children: [
                      Expanded(
                        child: SizedBox(
                          child: Image.network(menuGrid[i]['icon']),
                          width: 60,
                          height: 60,
                        ),
                      ),
                      const Padding(padding: EdgeInsets.only(top: 8)),
                      Text(
                        menuGrid[i]['name'].toString().tr,
                        textAlign: TextAlign.center,
                        style: const TextStyle(fontSize: 13),
                      ),
                    ],
                  ),
                  onPressed: () => Get.toNamed(
                    menuGrid[i]['route'],
                    arguments: [
                      menuGrid[i]['name'].toString().tr,
                      ...menuGrid[i]['route'] == '/place'
                          ? [menuGrid[i]['icon'], menuGrid[i]['tagId']]
                          : [],
                      ...menuGrid[i]['route'] == '/place-type'
                          ? [menuGrid[i]['type'], 0]
                          : [],
                    ],
                    id: 0,
                  ),
                )
          ],
        ),
      ),
    );
  }
}
