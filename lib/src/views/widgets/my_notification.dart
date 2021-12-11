import 'package:flutter/material.dart';

class MyNotification extends StatelessWidget {
  const MyNotification({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        child: Text('noti'),
      ),
      // bottomNavigationBar: const CustomBottomNavigationBar(),
    );
  }
}
