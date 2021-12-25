import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';

class PlaceType extends GetView<ConfigurationController> {
  final int navigatorKeyId;

  const PlaceType({Key? key, required this.navigatorKeyId}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final config = controller.configuration;
    List<dynamic> otherUtilities = config['otherUtilities'] != null
        ? List.from(config['otherUtilities'])
        : [];

    return SafeArea(
      child: Scaffold(
        backgroundColor: Colors.grey.shade200,
        appBar: AppBar(
          flexibleSpace: const Image(
            image: NetworkImage(
                'https://raw.githubusercontent.com/huuln9/images/main/banner_2.png'),
            fit: BoxFit.cover,
          ),
          leading: IconButton(
            icon: const Icon(Icons.arrow_back_ios, color: Colors.white),
            onPressed: () => Get.back(id: navigatorKeyId),
          ),
          title: Align(
            alignment: Alignment.centerLeft,
            child: Text(
              "Other utilities".tr,
              style: const TextStyle(fontSize: 20, color: Colors.white),
            ),
          ),
        ),
        body: Padding(
          padding: const EdgeInsets.all(30.0),
          child: GridView.count(
            crossAxisSpacing: 30,
            mainAxisSpacing: 30,
            crossAxisCount: 2,
            children: <Widget>[
              for (var i = 0; i < otherUtilities.length; i++)
                Container(
                  decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(24)),
                  child: IconButton(
                    icon: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        SizedBox(
                          child: Image.network(otherUtilities[i]['icon']),
                          width: 100,
                          height: 100,
                        ),
                        const Padding(padding: EdgeInsets.only(top: 15)),
                        Expanded(
                          child: Text(
                            otherUtilities[i]['name'].toString().tr,
                            style: const TextStyle(fontSize: 13),
                          ),
                        ),
                      ],
                    ),
                    onPressed: () => Get.toNamed(
                      otherUtilities[i]['route'],
                      arguments: [
                        otherUtilities[i]['name'].toString().tr,
                        otherUtilities[i]['icon'],
                        otherUtilities[i]['tagId'],
                      ],
                      id: navigatorKeyId,
                    ),
                  ),
                ),
            ],
          ),
        ),
      ),
    );
  }
}
